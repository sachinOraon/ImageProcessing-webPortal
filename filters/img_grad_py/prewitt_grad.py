from matlab import engine as e
import sys

eng=e.start_matlab()
img=sys.argv[1]
outMimg=sys.argv[2]
outAimg=sys.argv[3]
grayimg=sys.argv[4]
flag=eng.prewitt_grad(img, outMimg, outAimg, grayimg)
if flag==1: print('success')
else: print('failed')
eng.quit()