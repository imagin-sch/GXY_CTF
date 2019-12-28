alphabet = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890!@#$%^&*()_+-={}[]"
f = open("flag.txt", "r")
data = f.read()
result = {d:0 for d in alphabet}

def sort_by_value(d):
	items = d.items()
	backitems = [[v[1],v[0]] for v in items]
	backitems.sort(reverse=True)
	return [ backitems[i][1] for i in range(0,len(backitems))]

# while data:
for d in data:
	for alpha in alphabet:
		if d == alpha:
			result[alpha] = result[alpha] + 1
	# data = f.readline()
print(sort_by_value(result))


