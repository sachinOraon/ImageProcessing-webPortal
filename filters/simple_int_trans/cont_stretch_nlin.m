function flag = cont_stretch_nlin(input, outimg)
	img = imread(input);
	img = rgb2gray(img);
	[rows, cols] = size(img);
	intensity_low = 190;
	intensity_high = 230;
	img2 = img;
	for row = 1:rows
    	for col = 1:cols
        	if img2(row,col) > intensity_low && img2(row,col) < intensity_high
            	img2(row,col) = 50;
        	else
            	img2(row,col) = 240;
        	end
    	end
	end
	imwrite(img2, outimg);
	flag=1;
end