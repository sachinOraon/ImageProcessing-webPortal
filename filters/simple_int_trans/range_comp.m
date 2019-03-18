function flag=range_comp(img, outimg, c)
	input=imread(img);
	grayimg=rgb2gray(input);
	tmp=im2double(grayimg);
	%c can vary from 0 to 100
	new=c*log(1+tmp);
	imwrite(new, outimg);
	flag=1;
end