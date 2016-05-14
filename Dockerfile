# EventStore (geteventstore.com)
#
# VERSION               0.0.3

FROM      ubuntu:14.04.2
MAINTAINER Techbot <djtechbot@gmail.com>

RUN useradd -m docker && echo "docker:docker" | chpasswd && adduser docker sudo

USER root
RUN mkdir -p /tmp2
COPY *.* /tmp2/

EXPOSE 2113
EXPOSE 1113

VOLUME /data



