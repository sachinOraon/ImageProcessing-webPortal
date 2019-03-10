import cv2

image='../../../images/abc.jpg'
img=cv2.imread(image, cv2.IMREAD_GRAYSCALE)

ret2,ots = cv2.threshold(img,0,255,cv2.THRESH_BINARY+cv2.THRESH_OTSU)

if cv2.imwrite('../../../images/abc_thres_ots.jpg',ots): print('success',end='')
else: print('failed',end='')
