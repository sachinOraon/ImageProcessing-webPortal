import cv2
import sys

image='../../../images/'+sys.argv[1]
img=cv2.imread(image, cv2.IMREAD_GRAYSCALE)

tmp=sys.argv[1]
ext=sys.argv[2]
name=tmp[:len(tmp)-len(ext)-1]
output=name+'_thres_gauss'+'.'+ext
target='../../../images/'+output

tg = cv2.adaptiveThreshold(img,255,cv2.ADAPTIVE_THRESH_GAUSSIAN_C, cv2.THRESH_BINARY,11,2)
if cv2.imwrite(target,tg): print(output,end='')
else: print('failed',end='')
