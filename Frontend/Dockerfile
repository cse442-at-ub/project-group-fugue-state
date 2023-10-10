FROM python:3.8

ENV HOME /root
WORKDIR /root

COPY . .

RUN pip install --upgrade pip
RUN pip install flask

EXPOSE 8080

CMD python3 -u app.py