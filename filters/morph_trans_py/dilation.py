import cv2
import numpy as np
import sys

image='../../images/'+sys.argv[1]
img=cv2.imread(image, cv2.IMREAD_UNCHANGED)

kernel=np.ones((5,5),np.uint8)
morph=cv2.dilate(img,kernel,iterations=1)

tmp=sys.argv[1]
ext=sys.argv[2]
name=tmp[:len(tmp)-len(ext)-1]
output=name+'_morph_dilat'+'.'+ext
target='../../images/'+output

if cv2.imwrite(target,morph): print(output,end='')
else: print('failed',end='')