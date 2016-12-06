#!/usr/sh
mkdir tests/_files
wget https://placekitten.com/g/300/200 -O tests/_files/kitten.jpg
touch tests/_files/text.txt
echo "Hello world!" >> tests/_files/text.txt
