function cripto(dados) {
  // chave para criptografia simetrica
  var chave = CryptoJS.lib.WordArray.random(8)
  // iv para criptografia simetrica
  var iv = CryptoJS.lib.WordArray.random(8)

  // dado criptografado
  var criptografado = CryptoJS.AES.encrypt(
    dados,
    CryptoJS.enc.Utf8.parse(chave.toString()),
    {
      iv: CryptoJS.enc.Utf8.parse(iv.toString()),
      mode: CryptoJS.mode.CBC,
      padding: CryptoJS.pad.ZeroPadding
    }
  )

  // chave publica para criptografia assimetrica
  var chavepublica =
    '-----BEGIN PUBLIC KEY-----MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEA51l1XEMLMdLt33Y6d+/JGc/xKea5Lv9yjBO6OHrI0ZHMI3yBaBX5IFSyg5gpUliMQddXucZtnWNF1hsQ0u3nFzujjPkFN0eeGLkESx8qh/wvC2bFgVaY0+M0AV+poSsUkZPXxrd3UIT9j2uxunt8lN+r8AHQxAUUMNEMJyM1AFftKQe/HGr8H5dzRsMngqaPFcMAvNslfLyrZ06ApxerPdCeLYn2K89Y3j64EgSEqooYQ5DjXj9RBRlyHnWDUuEe0QGhHKXIUbUB8Bc0XMmu3ygRbbvwRjvWcy2gvgRwSFuAn2w9Ul+2+orrBUnE9xdDirc1i5F3k8YM1y166ZxPAwIDAQAB-----END PUBLIC KEY-----'

  var criptografia = new JSEncrypt()
  criptografia.setPublicKey(chavepublica)

  // chave com criptografia assimetrica
  var chaveCrypt = criptografia.encrypt(JSON.stringify(chave.toString()))
  // iv com criptografia assimetrica
  var ivCrypt = criptografia.encrypt(JSON.stringify(iv.toString()))

  // objeto com dados criptografados
  return {
    dados: criptografado.toString(),
    chave: chaveCrypt.toString(),
    iv: ivCrypt.toString()
  }
}
