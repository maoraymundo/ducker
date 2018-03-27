FROM nginx

ADD ./000_default.conf /etc/nginx/conf.d/000_default.conf

RUN echo "daemon off;" >> /etc/nginx/nginx.conf

CMD service nginx start