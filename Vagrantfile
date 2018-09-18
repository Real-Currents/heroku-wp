# -*- mode: ruby -*-
# vi: set ft=ruby :

VM_IP  = "192.168.50.100"

# Vagrantfile API/syntax version. Don't touch unless you know what you're doing!
VAGRANTFILE_API_VERSION = "2"

Vagrant.configure(VAGRANTFILE_API_VERSION) do |config|

  # config.vm.box = "bento/ubuntu-16.04"
  config.vm.box = "kbi/ubuntu16.04"
  config.vm.guest = :ubuntu
  config.vm.hostname = "herokuwp.local"
  config.vm.network :private_network, ip: VM_IP
  config.vm.provision :shell, :path => "support/vagrant/install.sh"

  config.vm.provider "libvirt" do |lv|
    lv.memory = "2048"
  end

  #config.vm.provider :virtualbox do |vb|
    # # Display the VirtualBox GUI when booting the machine
    # vb.gui = true
    #
    # # Customize the amount of memory on the VM:
    # vb.memory = "1024"
  #end

  #config.vm.provider :vmare_workstation # do |vmware| # do |vb|
    # # Configure networking on vmware vm:
    # vmware.vmx["ethernet0.pcislotnumber"] = "33"
  #end

  config.vm.network :forwarded_port, auto_correct: true, guest: 80, host: 8080

  config.vm.synced_folder ".", "/app", type: "rsync", rsync__exclude: %W[
    /audio/
    /bin/
    /tmp/
    /.vagrant/
    dc4cj2016/
    healing2017/
    media/
    org/
    pg4wp2/
    *.bak
    *.env
    *.idea
    *.pdf
    *.wpress
    *.zip
]

  # Use password auth
  # config.ssh.username = "vagrant"
  # config.ssh.password = "vagrant"

  # Manage our hostfile for us
  if Vagrant.has_plugin?("vagrant-hostmanager")
    config.hostmanager.enabled = true
    config.hostmanager.manage_host = true
    config.hostmanager.manage_guest = true
  else
    config.vm.post_up_message = "Vagrant-hostmanager is not installed. Manual update of your hostfile is required."
  end

end
