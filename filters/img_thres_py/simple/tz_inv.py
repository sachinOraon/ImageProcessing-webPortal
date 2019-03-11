import cv2
import sys

image='../../../images/'+sys.argv[1]
img=cv2.imread(image, cv2.IMREAD_GRAYSCALE)

ret,tzinv = cv2.threshold(img,127,255,cv2.THRESH_TOZERO_INV)

tmp=sys.argv[1]
ext=sys.argv[2]
name=tmp[:len(tmp)-len(ext)-1]
output=name+'_thres_tzinv'+'.'+ext
target='../../../images/'+output

if cv2.imwrite(target,tzinv): print(output,end='')
else: print('failed',end='')
