from socketserver import BaseRequestHandler,ThreadingTCPServer
import threading
import re
import socket
import time
 
BUF_SIZE=1024
FLAG = 340282366920938463463374607
LINKT = 3
class Handler(BaseRequestHandler):
   def handle(self):
      address,pid = self.client_address
      print('%s connected!'%address)
      bg_time = time.time()
      flg = 128
      while flg:
          data = self.request.recv(BUF_SIZE)
          if len(data)>0:
              sock = socket.socket(socket.AF_INET, socket.SOCK_STREAM)
              data = data.decode('utf-8')
              print('receive=',data)

              if re.match(r'\b\d+\b',data):
                  data = int(data)
                  cur_time = time.time()
                  distence = int(cur_time) - int(bg_time)
                  if distence > LINKT:
                    self.request.sendall('It took too long to break the link!'.encode('utf-8'))
                    print('Client took too long to break the link!')
                    break
                  if data == FLAG:
                      self.request.sendall('Well Done, give Your flag GXY{Qi9i_wants_a_boyfriend}'.encode('utf-8'))
                  elif data > FLAG:
                      self.request.sendall('too big'.encode('utf-8'))
                  elif data < FLAG:
                      self.request.sendall('too small'.encode('utf-8'))
              else:
                self.request.sendall('try to give me a number!'.encode('utf-8'))
                break

              cur_thread = threading.current_thread()
              flg = flg - 1
              print(flg)
              if flg == 0:
                print('You only have 128 chances！')
                break
          else:
              print('close')
              break
 
if __name__ == '__main__':
 # HOST = '127.0.0.1'
 HOST = ''		#所在服务器IP
 PORT = 10086	#端口号
 ADDR = (HOST,PORT)
 server = ThreadingTCPServer(ADDR,Handler)
 print('listening')
 server.serve_forever()
 print(server)
