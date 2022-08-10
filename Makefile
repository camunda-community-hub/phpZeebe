VERSION='8.0.4'

build-client:
	docker build -f build/Dockerfile . -t zeebe-client-builder
	docker run --rm -w /zeebe/build -v ${PWD}:/zeebe zeebe-client-builder php download_proto.php $(VERSION)
	docker run --rm -w /zeebe/build -v ${PWD}:/zeebe zeebe-client-builder rm -rf src/ZeebeClient/Command
	docker run --rm -w /zeebe/build -v ${PWD}:/zeebe zeebe-client-builder protoc --php_out=../src --grpc_out=../src --plugin=protoc-gen-grpc=/usr/bin/grpc_php_plugin zeebe.proto
	git add ./src/
	
tag:
	git commit --all -m "Zeebe client generated: $(VERSION)"
	git tag -a v$(VERSION) -m "Zeebe client version: $(VERSION)"

push-release:
	git push origin v$(VERSION)

release: build-client tag push-release
