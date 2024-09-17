# Ejercici2.ps1
# Enunciado:
# Creeu un script que ens mostri el nom dels 5 fitxers més antics que hi ha en la ruta del directori que li passem per paràmetre quan executeu l’script.
# En cas de no passar-li cap o que no existeixi aquesta ruta utilitzarà per defecte el directori actual.

Param(
    [string] $ruta
)

Write-Host "Ruta proporcionada: $ruta"

if ($ruta) {
    Get-ChildItem -Path $ruta |
        Sort-Object -Property CreationTime -Descending |
        Select-Object -First 5 |
        Format-Table CreationTime, FullName | Select-Object -First 20
}
else {
    Write-Output "No has indicado ninguna ruta, te asignamos la ruta actual"
    Get-ChildItem $PWD |
        Sort-Object -Property CreationTime -Descending |
        Select-Object -First 5 |
        Format-Table CreationTime, FullName
}
