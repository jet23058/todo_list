#!/bin/bash

# $(pwd)/build/{語系} 底下做執行

version=$1
# image_name : {區域}/{專案}/{docker image 名稱}:{版本}
# {版本} : 
#   - stage : 用日期
#   - production : 用版本號
image_name=todo_list:$version
cp ./env/production.env ../../.env
cd ../../
docker build -t $image_name .