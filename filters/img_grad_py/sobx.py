import cv2
import sys

image='../../images/'+sys.argv[1]

img=cv2.imread(image, cv2.IMREAD_UNCHANGED)

sobx=cv2.Sobel(img, cv2.CV_64F,1,0,ksize=5)

tmp=sys.argv[1]
ext=sys.argv[2]
name=tmp[:len(tmp)-len(ext)-1]
output=name+'_sobx'+'.'+ext
target='../../images/'+output

if cv2.imwrite(target, sobx): print(output, end='')
else: print('failed',end='')
