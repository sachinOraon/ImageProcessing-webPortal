function flag=bw_low_pass(img, outimg, cfreq, order)
	dim=rgb2gray(imread(img));
	cim=double(dim);
	[r,c]=size(cim);
	r1=2*r;
	c1=2*c;
	pim=zeros((r1),(c1));
	kim=zeros((r1),(c1));
	rim=zeros(r,c);
	%padding
	for i=1:r
		for j=1:c
			pim(i,j)=cim(i,j);
		end
	end
	%center the transform
	for i=1:r
		for j=1:c
			kim(i,j)=pim(i,j)*((-1)^(i+j));
		end
	end
	%2D fft
	fim=fft2(kim);
	%n is the order of the filter (1,2,3...)
	n=order; %order for butterworth filter
	
	[rf,cf]=size(fim);
	d0=cfreq;

	d=zeros(rf,cf);
	h=zeros(rf,cf);
	res=zeros(rf,cf);
	for i=1:rf
		for j=1:cf
			d(i,j)=sqrt( (i-(rf/2))^2 + (j-(cf/2))^2);
		end
	end

	for i=1:rf
		for j=1:cf
			h(i,j)=1 / (1+ (d0/d(i,j))^(2*n) ) ;
		end
	end


	for i=1:rf
		for j=1:cf
			res(i,j)=(h(i,j))*fim(i,j);
		end
	end

	ifim=ifft2(res);
	for i=1:r1
		for j=1:c1
			ifim(i,j)=ifim(i,j)*((-1)^(i+j));
		end
	end
	% removing the padding
	for i=1:r
		for j=1:c
			rim(i,j)=ifim(i,j);
		end
	end
	% retaining the ral parts of the matrix
	rim=real(rim);
	rim=uint8(rim);
	%if contains(img, 'jpg') || contains(img, 'jpeg')
	%	imwrite(rim, outimg, 'jpg', 'Quality', 100, 'Bitdepth', 8);
	%else
		imwrite(rim, outimg);
	%end
	flag=1;
end