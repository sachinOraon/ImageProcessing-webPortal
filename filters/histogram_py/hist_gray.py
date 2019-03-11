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
#show histogram in bin mode
lines = hist_lines(img)

tmp=sys.argv[1]
ext=sys.argv[2]
name=tmp[:len(tmp)-len(ext)-1]
gray_img='../../images/'+name+'_gray'+'.'+ext
hist_gray='../../images/'+name+'_hist_gray'+'.'+ext

cv2.imwrite(gray_img,gray,[100])
if cv2.imwrite(hist_gray,lines,[100]): print('success',end='')
else: print('failed',end='')