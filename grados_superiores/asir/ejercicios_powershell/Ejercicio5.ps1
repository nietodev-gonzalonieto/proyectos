# Ejercici5.ps1
# Enunciado:
# Heu de crear un script per a la creació d'usuaris a l'Active Directory del Windows 2016 a dins una unitat organitzativa (creada prèviament des del mateix servidor)
# agafant les dades del fitxer 'usuarios.csv' on han d'estar indicats els camps: common name, nombre inicio sesión, primer nom, cognom i password.
# Cada cop que es dona una alta cal mostrar per pantalla el nom de l'usuari.
# S'HA D'EXECUTAR DES D’UNA MÀQUINA CLIENT (loguejat com a administrador del domini).

$OUruta = 'OU=pepeuo,DC=gnieto,DC=com'

if (Get-ADOrganizationalUnit -Identity $OUruta -ErrorAction Ignore) {
    Write-Output "La unidad organizativa ya existía, hacemos el volcado de usuarios"
    Import-Csv .\usuarios.csv | ForEach-Object {
        New-ADUser -UserPrincipalName $_.userPrincipalName `
            -GivenName $_.GivenName `
            -Name $_.name `
            -DisplayName $_.name `
            -Surname $_.SurName `
            -Path $OUruta `
            -AccountPassword (ConvertTo-SecureString "Asdasd123" -AsPlainText -Force) `
            -Enabled $True `
            -PasswordNeverExpires $True `
            -PassThru |
            Write-Output "Usuario creado: $($_.Name)"
    }
}
else {
    Write-Output "La unidad organizativa no existe."
}
