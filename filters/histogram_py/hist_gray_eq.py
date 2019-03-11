import cv2
import numpy as np
import sys

def hist_lines(im):
    h = np.zeros((300,256,3))
    if len(im.shape)!=2:
        #hist_lines applicable only for grayscale images
        #so converting image to grayscale for representation
        im = cv2.cvtColor(im,cv2.COLOR_BGR2GRAY)
    hist_item = cv2.calcHist([im],[0],None,[256],[0,256])
    cv2.normalize(hist_item,hist_item,0,255,cv2.NORM_MINMAX)
    hist=np.int32(np.around(hist_item))
    for x,y in enumerate(hist):
        cv2.line(h,(x,0),(x,y),(255,255,255))
    y = np.flipud(h)
    return y

image='../../images/'+sys.argv[1]

img=cv2.imread(image, cv2.IMREAD_UNCHANGED)
gray = cv2.cvtColor(img,cv2.COLOR_BGR2GRAY)
bins = np.arange(256).reshape(256,1)
equ = cv2.equalizeHist(gray)
before = hist_lines(img)
lines = hist_lines(equ)

tmp=sys.argv[1]
ext=sys.argv[2]
name=tmp[:len(tmp)-len(ext)-1]
hist_gray='../../images/'+name+'_hist_gray'+'.'+ext
gray_img='../../images/'+name+'_gray'+'.'+ext
gray_eq='../../images/'+name+'_gray_eq'+'.'+ext
hist_gray_eq='../../images/'+name+'_hist_gray_eq'+'.'+ext

cv2.imwrite(hist_gray, before,[100]);
cv2.imwrite(gray_img, gray,[100])
cv2.imwrite(gray_eq, equ,[100])
if cv2.imwrite(hist_gray_eq, lines, [100]): print('success',end='')
else: print('failed',end='')