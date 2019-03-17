function flag = negative(img, outimg)
	j=imread(img);
	[r c]=size(j);
	for m=1:r
		for n=1:c
			j(m,n)=255-j(m,n);
		end
	end
	imwrite(j, outimg);
	flag=1;
end