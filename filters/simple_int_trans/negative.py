from matlab import engine as e
import sys

eng=e.start_matlab()
img=sys.argv[1]
outimg=sys.argv[2]
flag=eng.negative(img, outimg)
if flag == 1: print(outimg)
else: print('failed')
eng.quit()