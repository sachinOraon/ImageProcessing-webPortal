import cv2
import sys

image='../../images/'+sys.argv[1]

img=cv2.imread(image, cv2.IMREAD_UNCHANGED)

edges = cv2.Canny(img,100,200)

tmp=sys.argv[1]
ext=sys.argv[2]
name=tmp[:len(tmp)-len(ext)-1]
output=name+'_canny'+'.'+ext
target='../../images/'+output

if cv2.imwrite(target, edges): print(output,end='')
else: print('failed',end='')
