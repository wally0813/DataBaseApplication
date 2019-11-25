ALTER TABLE movie_info ADD filename VARCHAR(100) NOT NULL;
ALTER TABLE movie_info ADD imgurl VARCHAR(512) NOT NULL;



UPDATE movie_info SET filename='gods.jpg', imgurl='http://localhost:80/posters/gods.jpg' WHERE movie_idx=1;
UPDATE movie_info SET filename='maurice.jpg', imgurl='http://localhost:80/posters/maurice.jpg' WHERE movie_idx=2;
UPDATE movie_info SET filename='whattheyhad.jpg', imgurl='http://localhost:80/posters/whattheyhad.jpg' WHERE movie_idx=3;
UPDATE movie_info SET filename='taipei.jpg', imgurl='http://localhost:80/posters/taipei.jpg' WHERE movie_idx=4;
UPDATE movie_info SET filename='womaninhollywood.jpg', imgurl='http://localhost:80/posters/womaninhollywood.jpg' WHERE movie_idx=5;
UPDATE movie_info SET filename='highlife.jpg', imgurl='http://localhost:80/posters/highlife.jpg' WHERE movie_idx=6;
UPDATE movie_info SET filename='border.jpg', imgurl='http://localhost:80/posters/border.jpg' WHERE movie_idx=7;
UPDATE movie_info SET filename='maggie.jpg', imgurl='http://localhost:80/posters/maggie.jpg' WHERE movie_idx=8;
UPDATE movie_info SET filename='hummingbird.jpg', imgurl='http://localhost:80/posters/hummingbird.jpg' WHERE movie_idx=9;
UPDATE movie_info SET filename='kimjiyoung.jpg', imgurl='http://localhost:80/posters/kimjiyoung.jpg' WHERE movie_idx=10;
UPDATE movie_info SET filename='terminator.jpg', imgurl='http://localhost:80/posters/terminator.jpg' WHERE movie_idx=11;
UPDATE movie_info SET filename='weather.jpg', imgurl='http://localhost:80/posters/weather.jpg' WHERE movie_idx=12;
UPDATE movie_info SET filename='doctorsleep.jpg', imgurl='http://localhost:80/posters/doctorsleep.jpg' WHERE movie_idx=13;
UPDATE movie_info SET filename='killbill1.jpg', imgurl='http://localhost:80/posters/killbill1.jpg' WHERE movie_idx=14;
UPDATE movie_info SET filename='jocker.jpg', imgurl='http://localhost:80/posters/jocker.jpg' WHERE movie_idx=15;
UPDATE movie_info SET filename='thevillage.jpg', imgurl='http://localhost:80/posters/thevillage.jpg' WHERE movie_idx=16;
UPDATE movie_info SET filename='reservoirdogs.jpg', imgurl='http://localhost:80/posters/reservoirdogs.jpg' WHERE movie_idx=17;
UPDATE movie_info SET filename='django.jpg', imgurl='http://localhost:80/posters/django.jpg' WHERE movie_idx=18;
UPDATE movie_info SET filename='frozen2.jpg', imgurl='http://localhost:80/posters/frozen2.jpg' WHERE movie_idx=19;
UPDATE movie_info SET filename='adams.jpg', imgurl='http://localhost:80/posters/adams.jpg' WHERE movie_idx=20;
UPDATE movie_info SET filename='maleficent.jpg', imgurl='http://localhost:80/posters/maleficent.jpg' WHERE movie_idx=21;
UPDATE movie_info SET filename='sixteen.jpg', imgurl='http://localhost:80/posters/sixteen.jpg' WHERE movie_idx=22;
UPDATE movie_info SET filename='matchmade.jpg', imgurl='http://localhost:80/posters/matchmade.jpg' WHERE movie_idx=23;

