# Ejercici4.ps1
# Enunciado:
# Creeu un script que ens permeti donar d'alta els usuaris locals del sistema operatiu Windows10.
# Haurà de preguntar primer el nº d’usuaris que voleu donar d’alta.
# Després us haurà de demanar de forma interactiva el nom d'usuari, el password (en format ***), la descripció i el grup d'usuaris al que l’afegireu.
# Si el grup d’usuaris indicat no existeix caldrà que el doneu d’alta abans.

$usuarios = Read-Host 'Cuántos usuarios quieres dar de alta'

for ($i = 0; $i -lt $usuarios; $i++) {
    $name = Read-Host 'Nombre del usuario a crear'
    $Password = Read-Host -AsSecureString -Prompt 'Contraseña del usuario'
    $description = Read-Host 'Indica una descripción al nuevo usuario'

    New-LocalUser -Name $name -Password $Password -Description $description

    $grupo = Read-Host '¿A qué grupo lo quieres añadir?'
    if (Get-LocalGroup -Name $grupo) {
        Write-Output "El grupo ya existe y el usuario ha sido añadido"
    }
    else {
        New-LocalGroup -Name $grupo
        Write-Output "El grupo no existía y lo hemos creado, el usuario ha sido añadido"
    }
    Add-LocalGroupMember -Group $grupo -Member $name
}
