<?php
$c = file_get_contents("https://raw.githubusercontent.com/camunda/zeebe/{$argv[1]}/gateway-protocol/src/main/proto/gateway.proto");
$c .= "\noption php_namespace = \"Community\\\\PhpZeebe\\\\Command\";";
$c .= "\noption php_metadata_namespace = \"Community\\\\PhpZeebe\\\\Command\";";

file_put_contents("zeebe.proto", $c);

/*$protoc = file_get_contents('https://github.com/protocolbuffers/protobuf/releases/download/v21.4/protoc-21.4-linux-x86_64.zip');
file_put_contents('protoc.zip', $protoc);
$zip = new ZipArchive;
$zip->open("protoc.zip");
$zip->extractTo("./protoc/");
$zip->close();
rename('protoc/bin/protoc', 'protoc');
chmod('protoc', 0777);*/
?>