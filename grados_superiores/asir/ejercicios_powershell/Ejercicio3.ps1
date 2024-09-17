# Ejercici3.ps1
# Enunciado:
# Creeu un script que ens mostri per pantalla les dades més rellevants dels usuaris que formin part del grup Administradores i que exporti aquestes dades a un fitxer anomenat exportar.csv.
# Afegiu aquests usuaris a un nou grup, que haureu de crear (si no existeix) anomenat “Usuaris_exercici”, doneu a aquest grup alguns permisos per fer coses.

$groupName = "Administradores"
$outputFile = "exportar.csv"

# Exportar usuarios del grupo Administradores
Get-ADGroupMember -Identity $groupName -Recursive |
    Select-Object Name, DistinguishedName, SID |
    Export-Csv -Path $outputFile -NoTypeInformation

Write-Output "Los usuarios del grupo Administradores son:"
Get-ADGroupMember -Identity "Usuaris_exercici" |
    Select-Object Name, DistinguishedName, SID

if (Get-ADGroup -Filter { Name -eq "Usuaris_exercici" }) {
    Write-Output "El grupo ya existe"
}
else {
    New-ADGroup -Name "Usuaris_exercici" -GroupScope Global
    Write-Output "El grupo no existía y lo hemos creado"
}

Add-ADGroupMember -Identity "Usuaris_exercici" -Members (Get-ADGroupMember -Identity $groupName)
Write-Output "Los usuarios del grupo Usuaris_exercici son:"
Get-ADGroupMember -Identity "Usuaris_exercici" |
    Select-Object Name
