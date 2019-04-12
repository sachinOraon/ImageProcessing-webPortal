import cv2
import sys

image='../../images/'+sys.argv[1]

img = cv2.imread(image, cv2.IMREAD_GRAYSCALE)

# Denoising
dst = cv2.fastNlMeansDenoising(img,None,10,7,21)

tmp=sys.argv[1]
ext=sys.argv[2]
name=tmp[:len(tmp)-len(ext)-1]
output=name+'_noise_reduc_bw'+'.'+ext
target='../../images/'+output

# saving grayscaled image
cv2.imwrite('../../images/'+name+'_noise_bw'+'.'+ext, img)

if cv2.imwrite(target, dst): print(output,end='')
else: print('failed',end='')
