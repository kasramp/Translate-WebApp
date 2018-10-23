FROM mmorejon/apache2-php5
RUN rm -fr /app
ADD . /app
