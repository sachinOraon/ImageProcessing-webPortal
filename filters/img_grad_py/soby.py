import cv2
import sys

image='../../images/'+sys.argv[1]

img=cv2.imread(image, cv2.IMREAD_UNCHANGED)

soby=cv2.Sobel(img, cv2.CV_64F,0,1,ksize=5)

tmp=sys.argv[1]
ext=sys.argv[2]
name=tmp[:len(tmp)-len(ext)-1]
output=name+'_soby'+'.'+ext
target='../../images/'+output

if cv2.imwrite(target, soby): print(output, end='')
else: print('failed',end='')
