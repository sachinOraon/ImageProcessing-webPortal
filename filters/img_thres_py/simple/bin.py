import cv2

image='../../../images/abc.jpg'
img=cv2.imread(image, cv2.IMREAD_GRAYSCALE)

ret,bin = cv2.threshold(img,127,255,cv2.THRESH_BINARY)

if cv2.imwrite('../../../images/abc_thres_bin.jpg',bin): print('success',end='')
else: print('failed',end='')