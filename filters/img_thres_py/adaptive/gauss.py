import cv2

image='../../../images/abc.jpg'
img=cv2.imread(image, cv2.IMREAD_GRAYSCALE)

tg = cv2.adaptiveThreshold(img,255,cv2.ADAPTIVE_THRESH_GAUSSIAN_C, cv2.THRESH_BINARY,11,2)
if cv2.imwrite('../../../images/abc_thres_gauss.jpg',tg): print('success',end='')
else: print('failed',end='')
