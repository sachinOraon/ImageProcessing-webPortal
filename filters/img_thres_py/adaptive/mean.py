import cv2

image='../../../images/abc.jpg'
img=cv2.imread(image, cv2.IMREAD_GRAYSCALE)

tm = cv2.adaptiveThreshold(img,255,cv2.ADAPTIVE_THRESH_MEAN_C, cv2.THRESH_BINARY,11,2)
if cv2.imwrite('../../../images/abc_thres_mean.jpg',tm): print('success',end='')
else: print('failed',end='')
