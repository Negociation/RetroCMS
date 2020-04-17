#!/usr/bin/env bash
protoc --php_out=dist/php --grpc_out=dist/grpc --plugin=protoc-gen-grpc=/usr/bin/grpc_php_plugin protos/rcon.proto