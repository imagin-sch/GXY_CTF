from base64 import *
file = open('flag.txt','r')
alphabet = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/'
def inttobin(shu,n):
	tmp = bin(shu).replace('0b','')
	while len(tmp)<n:
		tmp = '0' + tmp
	return tmp
summ=''

for i in range(66):
	m = file.readline()
	m = m.replace("\n",'')
	m = m.replace("\r",'')
	if m.find('=') != -1:														#存在=
		#print(m)
		mm = str(b64encode(b64decode(m)))
		mm = mm.replace('b\'','')
		mm = mm.replace('\'','')
		#print(mm)
		if m[-1] == '=':
			if m[-2] == '=':
				tmp = alphabet.index(m[-3]) - alphabet.index(mm[-3])			#隐写四位
				result = inttobin(tmp,4)
			else:
				tmp = alphabet.index(m[-2]) - alphabet.index(mm[-2])			#隐写两位
				result = inttobin(tmp,2)
		summ += result
print(summ)