function flag=homomorphic(img, outimg, cfreq)
	I = imread(img);
	I = rgb2gray(im2double(I));
	I = log(1 + I);
	M = 2*size(I,1) + 1;
	N = 2*size(I,2) + 1;
	sigma = cfreq;
	[X, Y] = meshgrid(1:N,1:M);
	centerX = ceil(N/2); 
	centerY = ceil(M/2); 
	gaussianNumerator = (X - centerX).^2 + (Y - centerY).^2;
	H = exp(-gaussianNumerator./(2*sigma.^2));
	H = 1 - H;
	H = fftshift(H);
	fil = fft2(I, M, N);
	Iout = real(ifft2(H.*fil));
	Iout = Iout(1:size(I,1),1:size(I,2));
	Ihmf = exp(Iout) - 1;
	%saving file
	%if contains(img, 'jpg') || contains(img, 'jpeg')
	%	imwrite(Ihmf, outimg, 'jpg', 'Quality', 100, 'Bitdepth', 8);
	%else
		imwrite(Ihmf, outimg);
	%end
	flag=1;
end