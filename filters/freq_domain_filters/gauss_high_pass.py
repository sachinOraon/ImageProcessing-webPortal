import matlab.engine
import sys

eng=matlab.engine.start_matlab()
flag=eng.gauss_high_pass(sys.argv[1], sys.argv[2], float(sys.argv[3]))
if flag==1: print('success')
else: print('failed')
eng.quit()
