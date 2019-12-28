import socket,sys
import random
import math
import time
import threading
HOST = '127.0.0.1'
# HOST = '202.182.117.184'   #改为服务器的IP地址
PORT = 10086
ADDR =(HOST,PORT)
BUFSIZE = 1024

def link(i):
    sock = socket.socket()
    try:
      sock.connect(ADDR)
      print(i, 'have connected with server')
      flg = 1
      data2 = 0
      left = 0
      right = pow(2, 128)
      while flg:
          left = int(left)
          right = int(right)
          print(left,right)

          time.sleep(0.01)
          data1 = left+int((right-left)/2)
          if data2 == data1:
              data1 = data1 + 1
          else:
              data2 = data1
          data1 = str(data1)
          print('sock.send：',data1)
          sock.sendall(data1.encode('utf-8'))
          recv_data = sock.recv(BUFSIZE)
          recv_data = recv_data.decode('utf-8')
          print('receive:',recv_data)
          if recv_data == 'big':
            right = data1
          elif recv_data == 'small':
            left = data1
          else:
            flg = 0
            print(data1)
            break
    except Exception:
        print('error')
    sock.close()
    sys.exit()


for i in range(1):
    thread = threading.Thread(target=link,args=(i,))
    thread.start()

