import cv2
import sys

image='../../images/'+sys.argv[1]
img=cv2.imread(image, cv2.IMREAD_UNCHANGED)

lap=cv2.Laplacian(img, cv2.CV_64F)

tmp=sys.argv[1]
ext=sys.argv[2]
name=tmp[:len(tmp)-len(ext)-1]
output=name+'_lap'+'.'+ext
target='../../images/'+output

if cv2.imwrite(target,lap): print(output, end='')
else: print('failed',end='')
