function flag=gamma(img, outimg, g)
	im=imread(img);
	gm=imadjust(im,[],[],g);
	imwrite(gm, outimg);
	flag=1;
end