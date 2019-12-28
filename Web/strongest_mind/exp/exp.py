from requests import *
import re


s = session()
a = s.get("http://172.21.4.12:10044/index.php")
pattern = re.findall(r'\d+.[+-].\d+', a.text) 
c = eval(pattern[0])
a = s.post("http://172.21.4.12:10044/index.php", data = {"answer" : c})
for i in range(1000):
	pattern = re.findall(r'\d+.[+-].\d+', a.text) 
	c = eval(pattern[0])
	print(c)
	a = s.post("http://172.21.4.12:10044/index.php", data = {"answer" : c})
print(a.text)