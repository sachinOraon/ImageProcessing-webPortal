import matlab.engine
import sys

eng=matlab.engine.start_matlab()
flag=eng.bw_high_pass(sys.argv[1], sys.argv[2], float(sys.argv[3]), float(sys.argv[4]))
if flag==1: print('success')
else: print('failed')
eng.quit()
