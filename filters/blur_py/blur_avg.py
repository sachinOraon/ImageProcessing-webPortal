import cv2

image='../../images/abc.jpg'
img=cv2.imread(image, cv2.IMREAD_UNCHANGED)

blur=cv2.blur(img,(5,5))

if cv2.imwrite('../../images/abc_blur_avg.jpg',blur): print('success',end='')
else: print('failed',end='')
