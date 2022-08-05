puts File.read('attacker.crt').gsub("/--+.*--+/","").gsub("\n","")

# edit the certificate to put it in the x5c header
