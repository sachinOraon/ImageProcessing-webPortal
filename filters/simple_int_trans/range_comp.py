from matlab import engine as e
import sys

eng=e.start_matlab()
flag=eng.range_comp(sys.argv[1], sys.argv[2], float(sys.argv[3]))
if flag==1: print('done')
else: print('failed')
eng.quit()