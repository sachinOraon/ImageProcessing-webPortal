import cv2

image='../../../images/abc.jpg'
img=cv2.imread(image, cv2.IMREAD_GRAYSCALE)

# Otsu's thresholding after Gaussian filtering
blur = cv2.GaussianBlur(img,(5,5),0)
ret3,otg = cv2.threshold(blur,0,255,cv2.THRESH_BINARY+cv2.THRESH_OTSU)

if cv2.imwrite('../../../images/abc_thres_otg.jpg',otg): print('success',end='')
else: print('failed',end='')
