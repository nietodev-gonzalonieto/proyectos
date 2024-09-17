# Ejercici1.ps1
# Enunciado:
# Creeu un script que ens pregunti pel nom d’un procés. Després haureu de comprovar si hi ha en execució algun procés amb aquest nom.
# Si n’hi ha algun haureu de guardar tota la informació d’aquest en un fitxer anomenat info_proces.txt del vostre escriptori.

$Proceso = Read-Host "Introduce un proceso"
if ($Proceso) {
    (Get-Process).Where{$_.Name -like "$Proceso"} | Out-File -FilePath "$env:USERPROFILE\Desktop\info_proces.txt"
    Write-Output "Se ha creado un fichero con la información del proceso en el escritorio"
}
else {
    Write-Output "No has indicado ningun proceso o ese proceso no existe"
}
