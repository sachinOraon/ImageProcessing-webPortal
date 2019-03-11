import cv2
import numpy as np
import sys

def hist_curve(im):
    h = np.zeros((300,256,3))
    if len(im.shape) == 2:
        color = [(255,255,255)]
    elif im.shape[2] == 3:
        color = [ (255,0,0),(0,255,0),(0,0,255) ]
    for ch, col in enumerate(color):
        hist_item = cv2.calcHist([im],[ch],None,[256],[0,256])
        cv2.normalize(hist_item,hist_item,0,255,cv2.NORM_MINMAX)
        hist=np.int32(np.around(hist_item))
        pts = np.int32(np.column_stack((bins,hist)))
        cv2.polylines(h,[pts],False,col)
    y=np.flipud(h)
    return y

image='../../images/'+sys.argv[1]

img=cv2.imread(image, cv2.IMREAD_UNCHANGED)
bins = np.arange(256).reshape(256,1)
#show histogram for color image in curve mode
curve = hist_curve(img)

tmp=sys.argv[1]
ext=sys.argv[2]
name=tmp[:len(tmp)-len(ext)-1]
hist_col='../../images/'+name+'_hist_col'+'.'+ext

if cv2.imwrite(hist_col,curve,[100]): print('success',end='')
else: print('failed',end='')