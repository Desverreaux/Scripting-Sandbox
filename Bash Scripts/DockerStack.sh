#!/bin/bash
touch result.txt
echo "version: '2'" >> ./result.txt
find . -name 'docker-compose.yml' -exec sh -c '
cat {} | sed -e '1d' >> ./result.txt
' \;

#the fact that each docker file has three different sections makes writing the rest 
#of this script not worth it, so for now it is defered