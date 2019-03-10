import cv2

image='../../../images/abc.jpg'
img=cv2.imread(image, cv2.IMREAD_GRAYSCALE)

ret,trun = cv2.threshold(img,127,255,cv2.THRESH_TRUNC)

if cv2.imwrite('../../../images/abc_thres_trun.jpg',trun): print('success',end='')
else: print('failed',end='')
