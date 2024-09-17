#!/bin/bash
#Variables
IPTABLES=/sbin/iptables
OUTenp=enp0s3
INenp=enp0s8
xal=192.168.1.0/24
administracio=192.168.3.0/24
redDmz=192.168.5.0/24
ipServidorDmz=192.168.5.1
ipServidorWeb=192.168.5.10

#Reiniciamos reglas
$IPTABLES -F
$IPTABLES -X
$IPTABLES -Z
$IPTABLES -t nat -F
$IPTABLES -t mangle -F

#Bloqueamos conexiones
$IPTABLES -P INPUT DROP
$IPTABLES -P OUTPUT DROP
$IPTABLES -P FORWARD DROP

#Enrutamiento
$IPTABLES -t nat -A POSTROUTING -s $redDmz -o $OUTenp -j MASQUERADE

##Acceso a los servicios
$IPTABLES -A FORWARD -p udp  -d $ipServidorWeb --dport 53 -j ACCEPT
$IPTABLES -A FORWARD -p tcp  -d $ipServidorWeb --dport 80 -j ACCEPT
$IPTABLES -A FORWARD -p tcp  -d $ipServidorWeb --dport 443 -j ACCEPT
$IPTABLES -A FORWARD -p tcp  -d $ipServidorWeb --dport 110 -j ACCEPT
$IPTABLES -A FORWARD -p tcp  -d $ipServidorWeb --dport 143 -j ACCEPT
$IPTABLES -A FORWARD -p tcp  -d $ipServidorWeb --dport 25 -j ACCEPT
$IPTABLES -A FORWARD -p tcp  -d $ipServidorWeb --dport 993 -j ACCEPT
$IPTABLES -A FORWARD -p tcp  -d $ipServidorWeb --dport 995 -j ACCEPT

#Permitir Ping Administrador
$IPTABLES -A INPUT -p icmp -s $administracio -j ACCEPT
$IPTABLES -A OUTPUT -p icmp --icmp-type echo-reply -d $administracio -j ACCEPT
$IPTABLES -A FORWARD -p icmp -s $administracio -j ACCEPT
$IPTABLES -A FORWARD -p icmp --icmp-type echo-reply -d $administracio -j ACCEPT

#Acceso del DMZ a otras redes
##Respuestas del Servidor WEB
###DNS
$IPTABLES -A FORWARD -p udp --sport 53 -s $redDmz -j ACCEPT
###HTPP/S
$IPTABLES -A FORWARD -p tcp --sport 80 -s $redDmz -m state --state ESTABLISHED,RELATED -j ACCEPT
$IPTABLES -A FORWARD -p tcp --sport 443 -s $redDmz -m state --state ESTABLISHED,RELATED -j ACCEPT
###CORREU
$IPTABLES -A FORWARD -p tcp --sport 110 -s $redDmz -m state --state ESTABLISHED,RELATED -j ACCEPT
$IPTABLES -A FORWARD -p tcp --sport 993 -s $redDmz -m state --state ESTABLISHED,RELATED -j ACCEPT
$IPTABLES -A FORWARD -p tcp --sport 995 -s $redDmz -m state --state ESTABLISHED,RELATED -j ACCEPT
$IPTABLES -A FORWARD -p tcp --sport 25 -s $redDmz -m state --state ESTABLISHED,RELATED -j ACCEPT
$IPTABLES -A FORWARD -p tcp --sport 143 -s $redDmz -m state --state ESTABLISHED,RELATED -j ACCEPT


###SAMBA
$IPTABLES -A FORWARD -p tcp --sport 445 -s $redDmz -m state --state ESTABLISHED,RELATED -j ACCEPT

#Acceso por SSH a servidores DMZ
##permitir ssh vlan admin
$IPTABLES -A FORWARD -p tcp -s $administracio -i $OUTenp -d $ipServidorWeb --dport 22 -j ACCEPT
##resposta ssh
$IPTABLES -A FORWARD -p tcp -s $ipServidorWeb --sport 22 -d $administracio -m state --state ESTABLISHED,RELATED -j ACCEPT


#Acceso por SSH al Firewall DMZ
##permitir ssh a fw desde vlan admin
$IPTABLES -A INPUT -p tcp -s $administracio -i $OUTenp -d $ipServidorDmz --dport 22 -j ACCEPT
$IPTABLES -A OUTPUT -p tcp -s $ipServidorDmz --sport 22 -d $administracio -m state --state ESTABLISHED,RELATED -j ACCEPT

#LOG acceso de administracion al Servidor DMZ
##LOG ssh FireWall
$IPTABLES -A INPUT -p tcp -m tcp --dport 22 -j LOG --log-prefix 'INTENTO DE ACCESO A SSH. ' --log-level 4
##LOG ssh Servidor WEB
$IPTABLES -A FORWARD -p tcp -m tcp --dport 22 -j LOG --log-prefix 'INTENTO DE ACCESO A SSH. ' --log-level 4

#Puerto SAMBA para el backup del Wordpress
$IPTABLES -A INPUT -p tcp -s $ipServidorWeb -d $ipServidorDmz --dport 445 -j ACCEPT
$IPTABLES -A OUTPUT -p tcp --sport 445 -s $ipServidorDmz -d $ipServidorWeb -m state --state ESTABLISHED,RELATED -j ACCEPT
#si es en el nas de otra red es FORWARD

##Enrutamiento a otras redes
##ip route add 192.168.1.0/24 via 10.0.110.226
ip route add 192.168.2.0/24 via 10.0.110.226
ip route add 192.168.3.0/24 via 10.0.110.226
ip route add 192.168.4.0/24 via 10.0.110.226
ip route add 192.168.5.0/24 via 10.0.110.226
ip route add 192.168.6.0/24 via 10.0.110.226